<template>
<div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="javascript:void(0);" @click="$bvModal.show('add-role-modal')" class="btn btn-success mb-2"> Add Role </a>
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
                    <b-modal id="add-role-modal" title="Add Application Role">
                        <form class="form">
                            <div class="form-group">
                                <label for="rolename">Role Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rolename">Default Guard</label>
                                <input type="text" class="form-control" value="api" :disabled="true">
                            </div>
                        </form>
                        <template v-slot:modal-footer="{cancel }">
                            <b-button size="md" variant="danger" @click="cancel()">
                                Cancel
                            </b-button>
                            <!-- Button with custom close trigger value -->
                            <b-button size="md" variant="outline-primary" @click="saveRole()">
                                SAVE
                            </b-button>
                        </template>
                    </b-modal>
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
                    // console.log(data)
                    this.roles = data;
                })
                .catch(({
                    response
                }) => {
                    console.log("Error")
                });
        },
        saveRole() {
            return;
        },
        cancel() {
            return;
        }
    },
    mounted() {
        this.loadAdminRoles();
    },

}
</script>

<style>
.modal-backdrop {
    background-color: rgba(109, 109, 109, 0.178)
}
</style>
