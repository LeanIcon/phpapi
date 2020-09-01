<template>
<div>
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <router-link to="/admin/add-news" class="waves-effect">
                                            News Posts
                                        </router-link>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck">
                                        <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Post Image </th>
                               
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts.data" :key="index">
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ post.title }}</td>
                                <td>{{ post.body }}</td>
        
                                
                                <td>
                                    <!-- <a href="javascript:void(0);" @click="editUser(user)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click="viewUser(user)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a> -->
                                    <a href="javascript:void(0);" @click="deletedru(post.id, index)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                                <pagination :data="posts" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
    <modal name="news-modal">
        <div class="card">
            <div class="card-header">
                Drug Class
            </div>
            <div class="card-body">
               <form method = "post" name="postnews" id="postnews" action="#" enctype="multipart/form-data" @submit.prevent="addnews">
                   <div class="row">
                       <div class="col-lg-6 p-1">
                           <label for="">Title</label>
                           <input v-model="post.title" type="text" class="form-control" >
                       </div>
                       <div class="col-lg-6 p-1">
                           <label for="">Image</label>
                           <input type="file" accept="image/*" @change="onChange" />
                            <div id="preview">
                            <img v-if="post.imageUrl" :src="post.image" />
                        </div>
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
    </modal>
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

            getResults(page = 1) {
			axios.get('post?page=' + page)
				.then(response => {
					this.drug_class = response.data;
                });
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

             deletedru(id, index) {
                axios.delete('post/'+id)
                    .then(resp => {
                    this.drug_classes.data.splice(index, 1)
                    this.$swal('News Post deleted successfully');
                            })
                .catch(error => {
                    console.log(error);
                    })
                },

            newsmodal(){
                this.$modal.show('news-modal');
            },


            async loaddrugclass(url = 'post') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.drug_classes = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
            
            }
            
        },

        mounted() {
        this.loaddrugclass();
    },


}
</script>

<style>
     table, input, a, label {
        font-family: 'Roboto' !important;
    }
</style>