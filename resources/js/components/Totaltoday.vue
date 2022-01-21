<template>
<div>
    <br />
    <br />
    <br />
    <br />
    <center>
        <div class="table-wrapper">
            <div style="padding-bottom: 15px; background: #00A36C; color: #f5f5f5; padding: 20px 30px; margin: -25px -5px 10px; border-radius: 4px 4px 0 0;">
                <div class="row" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif">
                    <div class="col-xs-6">
                        <h2 style="margin: 5px 0 0; font-size: 30px"><b>Pending Records</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Profession</th>
                        <th>Accreditation Number (if any)</th>
                        <th>Feedback Date</th>
                        <th>Action</th>
                    </tr>  
                </thead> 
                <tbody v-if="users && users.data.length > 0">
                    <tr v-for="(user,index) in users.data" :key="index">
                        <td>{{ user.name_ }}</td>
                        <td>{{ user.profession_ }}</td>
                        <td>{{ user.accreditation_ }}</td>
                        <td>{{ user.date_ }}</td>
                        <td><i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i></td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td align="center" colspan="5">No record found.</td>
                    </tr>
                </tbody>
                <Page :data="users"/>
            </table>
            
        </div>
    </center>
</div>
</template>
<script>
import http from "../http-common.js";
export default {
    name: 'app',
    data() {
        return{
            page: 1,
            users: null,
            total: null,
            ppage: null,
            cPage: null
        }
    },
    props: {
        records: Number,
        perPage: Number
    },
    computed: {
        totalPages(){
        },
        totalChunks(){

        },
        currentChunk(){

        }
    },
    mounted(){
        this.list()
    },
    methods:{
        async list(page=1){
            console.log(page);
                http.get(`/today?page=${page}`).then(({data})=>{
                    this.users = data;
                    this.total = data.total;
                    this.ppage = data.per_page;
                    this.cPage = data.current_page;
                    console.log(data);
                }).catch(({ response })=>{
                    console.error(response)
                })
            }
    }
}
</script>