<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form>
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

        handleFileUpload() {
            this.file = this.$refs.file.files[0];
        },
        submitFile() {
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
            axios.post('/wholesaler/product/collection',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function () {
                    console.log('SUCCESS!!');
                })
                .catch(function () {
                    console.log('FAILURE!!');
                });
        },
    }
}
</script>

<style>

</style>
