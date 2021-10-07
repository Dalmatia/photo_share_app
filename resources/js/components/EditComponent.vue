<template>
    <div>
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            編集画面
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            enctype="multipart/form-data"
                            @submit.prevent="updateAlbum"
                        >
                            <div class="form-group">
                                <label>アルバム名</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    maxlength="15"
                                    required=""
                                    v-model="editRecord.name"
                                />
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <textarea
                                    class="form-control"
                                    maxlength="200"
                                    name="description"
                                    required=""
                                    v-model="editRecord.description"
                                ></textarea>
                            </div>
                            <div class="form-group">
                                <label>カテゴリー</label>
                                <select
                                    class="form-control"
                                    name="category"
                                    v-model="editRecord.category_id"
                                >
                                    <option
                                        v-for="(category, index) in categories"
                                        :key="index"
                                        :value="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>イメージ</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    v-on:change="onImageChange"
                                />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    アルバムを更新する
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['editRecord'],
    data() {
        return {
            categories: [],
            image: '',
        };
    },
    created() {
        this.getCategories();
    },
    methods: {
        onImageChange(e) {
            console.log(e);
            this.image = e.target.files[0];
        },
        getCategories() {
            axios
                .get('/api/categories')
                .then((response) => {
                    this.categories = response.data;
                })
                .catch((error) => {
                    alert('カテゴリーを取得できませんでした。');
                });
        },
        updateAlbum() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                },
            };
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('name', this.editRecord.name);
            formData.append('description', this.editRecord.description);
            formData.append('category_id', this.editRecord.category_id);
            formData.append("_method", "put");
            axios
                .post(
                    '/albums/' + this.editRecord.id + '/edit',
                    formData,
                    config
                )
                .then((response) => {
                    $('#exampleModal').modal('hide');
                    this.$emit('recordUpdated', response);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '変更内容を保存しました',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>