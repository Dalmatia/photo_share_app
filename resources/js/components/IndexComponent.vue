<template>
    <div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">イメージ</th>
                    <th scope="col">アルバム名</th>
                    <th scope="col">内容</th>
                    <th scope="col">カテゴリー</th>
                    <th scope="col">詳細</th>
                    <th scope="col">追加</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(album, index) in albums" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td class="w-25">
                        <img
                            :src="'/album/' + album.image"
                            class="img-fluid img-thumbnail"
                            alt="Sheep"
                        />
                    </td>
                    <td>{{ album.name }}<a href=""></a></td>
                    <td>{{ album.description }}</td>
                    <td>{{ album.category.name }}</td>
                    <td>
                        <a :href="'/albums/' + album.slug + '/' + album.id">
                            <button class="btn btn-outline-success">詳細</button>
                        </a>
                    </td>
                    <td>
                        <a :href="'/upload/images/' + album.id">
                            <button class="btn btn-outline-primary">
                                追加
                            </button>
                        </a>
                    </td>
                    <td>
                        <button
                            @click.prevent="edit(album.id)"
                            type="button"
                            class="btn btn-outline-secondary"
                            data-toggle="modal"
                            data-target="#exampleModal"
                        >
                            編集
                        </button>
                    </td>
                    <td>
                        <button
                            @click.prevent="deleteRecord(album.id)"
                            class="btn btn-outline-danger"
                        >
                            削除
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination :meta="meta" v-on:pagination="getAlbums"></pagination>
        <edit :editRecord="records" @recordUpdated="recordUpdate"></edit>
    </div>
</template>

<script>
export default {
    data() {
        return {
            albums: [],
            records: [],
            meta: {},
        };
    },
    created() {
        this.getAlbums();
    },
    methods: {
        getAlbums(page) {
            axios
                .get('/getAlbums', {
                    params: {
                        page,
                    },
                })
                .then((response) => {
                    this.albums = response.data.data;
                    this.meta = response.data.meta;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        edit(id) {
            axios
                .get('/api/albums/' + id)
                .then((response) => {
                    this.records = response.data;
                })
                .catch((error) => {
                    alert('データが取得出来ませんでした。');
                });
        },
        recordUpdate(response) {
            this.albums = response.data;
        },
        deleteRecord(id) {
            Swal.fire({
                title: '本当によろしいですか?',
                icon: 'warning',
                text: 'この操作は取り消せません!',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: '削除する',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'キャンセル',
            }).then((result) => {
                if (result.value) {
                    axios
                        .delete('/albums/' + id + '/delete')
                        .then((response) => {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '変更内容を保存しました',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            this.albums = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            });
        },
    },
};
</script>