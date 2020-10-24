<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="submitFile" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="control-label">UPLOAD FILE</label>
                            <input type="file" class="form-control" id="file" ref="file" v-on:change="handleFileUpload()" />
                        </div>
                        <button class="btn btn-success">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            file: ''
        }
    },
    methods: {
        openNotification(position = null, color, text = 'Unprovided') {
            const noti = this.$vs.notification({
                square: true,
                flat: true,
                color,
                position,
                title: text,
                // text: ''
            })
        },
        handleFileUpload() {
            this.file = this.$refs.file.files[0];
        },
        submitFile() {
            this.loading = !this.loading;
            /*
                Initialize the form data
            */
            let formData = new FormData();

            /*
                Add the form data we need to submit
            */
            formData.append('file', this.file);

            /*
              Make the request to the POST /single-file URL
            */
            const loading = this.$vs.loading({
                text: "Upload Product Please Wait...",
                type: "rectangle"
            });

            axios.post('/product/upload',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (response) {
                    // this.loading != this.loading;
                    loading.close();
                    // this.openNotification('top-right', 'success', 'Product Upload Successfull')
                    // this.$swal('Hello Vue world!!!');
                    console.log('SUCCESS!!', response);
                })
                .catch(function (error) {
                    // this.loading != this.loading;
                    loading.close();
                    // this.$swal('Error...');
                    // this.openNotification('top-right', 'error', 'Upload Did not complete... Try Again...')
                    console.log('FAILURE!!', error);
                });
            // axios.post('/wholesaler/product/upload',
            //         formData, {
            //             headers: {
            //                 'Content-Type': 'multipart/form-data'
            //             }
            //         }
            //     ).then(function (response) {
            //         console.log('SUCCESS!!', response);
            //     })
            //     .catch(function (error) {
            //         console.log('FAILURE!!', error);
            //     });
        },
    }
}
</script>

<style>

</style>
