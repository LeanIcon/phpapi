<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" class="btn btn-success mb-2"> Add Role </a>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered datatable dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="DataTables_Table_0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Guard Name</th>

                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(role) in roles" :key="role.id">
                                <td>{{role.id}}</td>
                                <td>{{role.name}}</td>
                                <td>{{role.guard_name}}</td>
                                <td>
                                    <a href="javascript:void(0);" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class=" ri-edit-box-line font-size-18"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            roles: []
        }
    },
    methods: {
        loadAdminRoles(url = 'roles') {
            axios.get(`${url}`).then(({
                    data
                }) => {
                    console.log(data)
                    this.roles = data;
                })
                .catch(({
                    response
                }) => {
                    console.log(response)
                });
        }
    },
    mounted() {
        this.loadAdminRoles();
    },

}
</script>

<style>

</style>
