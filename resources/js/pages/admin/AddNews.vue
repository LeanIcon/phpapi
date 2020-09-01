<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Add News
            </div>
            <form method = "post" name="postnews" id="postnews" action="#" enctype="multipart/form-data" @submit.prevent="addnews">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Title</label>
                           <input v-model="post.title" type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                           <label for="">Image</label>
                           <input type="file" @change="uploadImage" />
                            
                       </div>
                   </div>
                   <div class="row">
                       <label for="">Content</label>
                       <textarea v-model="post.body" name="body" class="form-control" id="" cols="30" rows="10"></textarea>
                   </div>
                   <button class="btn btn-primary" >SAVE</button>
               </form>
               



        </div>
        </div>
</div>
</template>

<script>
export default {
     data() {
            return {
                posts: {},
                post: {
                title: '',
                image: '',
                body: ''
                }
            }
        },
        
        methods: {

            uploadImage(e){
                //console.log(e.target.files[0])
                var filereader = new FileReader()
                filereader.readAsDataURL(e.target.files[0])
                filereader.onload = (e) =>{
                    this.post.image = e.target.result
                }
                 
                }
            },

           
        async addnews() {
                axios.post('post',{
                        'title': this.post.title,
                        'image': this.post.image,
                        'body': this.post.body
                        
                    })
                    .then((res) => {
                        console.log(res.data);
                        this.post.title = '',
                        this.post.image = '',
                        this.post.body = '',
                        this.loading != this.loading
                        this.$swal('News added successfully');
                        loading.close()
                        $('news-modal').modal('hide');
                        
                    })
                    .catch((err) =>{
                        console.log(err);
                    })
            },        


}
</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>