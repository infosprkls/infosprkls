<template>
    <div id="app">
        <!-- SideBar Component -->
        <sidebar/>
        <div class="main-content">
            <!-- navbar Component -->
            <navbar/>
            <!-- Inner content -->
            <div class="inner-content">
                <section>
                    <b-container fluid>
                        <b-row class="m-0">
                            <b-col>
                                <div class="card">
                                    <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                        <div class="content-card-left">
                                            <h4 class="card-title text-white">Users</h4>
                                            <p class="card-category mb-0">Here you can manage users</p>
                                        </div>
                                        <div class="content-card-right ml-auto">
                                            <a href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                                <i class="material-icons">add_box</i>
                                                <span class="text-uppercase">Add user</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <b-form class="table-header mx-0 my-3">
                                            <b-row class="justify-content-lg-between m-0">
                                                <b-col cols="12" sm="6" md="6" lg="4" xl="3" class="order-lg-1 order-md-1 order-sm-1 order-2 text-lg-left text-md-left text-sm-left text-right px-small-custom">
                                                    <b-form-group
                                                        label="Show"
                                                        label-for="per-page-select"
                                                        class="mb-0 table-length d-inline-block">
                                                            <b-form-select
                                                                id="per-page-select"
                                                                :options="pageOptions"
                                                                class="mx-3 border-0"
                                                            ></b-form-select>
                                                    </b-form-group>
                                                    <span class="label-length">entries</span>
                                                </b-col>
                                                <b-col cols="12" sm="6" md="6" lg="4" xl="3" class="mb-2 mt-1 px-0 order-lg-2 order-md-2 order-sm-2 order-1">
                                                     <b-form-group label-for="input-1" class="position-relative">
                                                        <b-form-input
                                                        id="input-1"
                                                        type="text"
                                                        placeholder="Search..."
                                                        class="search-field border-0"
                                                        ></b-form-input>
                                                        <i class="material-icons position-absolute">search</i>
                                                    </b-form-group>
                                                </b-col>
                                            </b-row>
                                        </b-form>
                                        <div class="table-responsive mb-0">
                                            <b-table-simple  class="custom-table table-user">
                                                <b-thead>
                                                    <b-tr>
                                                        <b-th>Name</b-th>
                                                        <b-th>Email</b-th>
                                                        <b-th>Role</b-th>
                                                        <b-th>Company</b-th>
                                                        <b-th>Creation date</b-th>
                                                        <b-th class="action">Actions</b-th>
                                                    </b-tr>
                                                </b-thead>
                                                <b-tbody>
                                                    <b-tr>
                                                        <b-td><a href="#">Imran Khan</a></b-td>
                                                        <b-td>superuser@ai-solutions.nl</b-td>
                                                        <b-td>Super User</b-td>
                                                        <b-td>AI Solutions</b-td>
                                                        <b-td>2020-12-24 16:26:56</b-td>
                                                        <b-td class="action">
                                                            <ul class="list-unstyled m-0">
                                                                <li class="d-inline-block">
                                                                    <a href="#" class="edit" v-ripple="{color: '#4caf50', startingOpacity: 0.9, easing: 'ease-in'}">
                                                                        <i class="material-icons">edit</i>
                                                                    </a>
                                                                </li>
                                                                <li class="d-inline-block">
                                                                    <a href="#" class="cancel" v-ripple="{color: '#f44336', startingOpacity: 0.9, easing: 'ease-in'}">
                                                                        <i class="material-icons">close</i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </b-td>
                                                    </b-tr>
                                                </b-tbody>
                                            </b-table-simple>
                                        </div>
                                    </div>
                                    <div class="card-footer card-footer custom-pagination flex-wrap m-0 px-4 pb-0 border-0 bg-transparent">
                                        <p class="d-lg-inline-block text-secondary">Showing 1 to 10 of 10 entries.</p>
                                    </div>
                                </div>
                            </b-col>
                        </b-row>
                    </b-container>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import sidebar from '../includes/sidebar.vue';
import navbar from '../includes/nav.vue';

export default {
    components: {
        'sidebar':sidebar,
        'navbar': navbar
    },
    data() {
        return {
            pageOptions: [5, 10, 15,],
        }
    }
}
</script>