 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Salary</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
           All Salary Details
           
          </div>
          <div class="card-body">
            <div class="card-body">
              <div class="table-responsive">
                <label>Search</label>
               <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Month Name</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="salary in filtersearch" :key="salary.salary_month">
                      <td>{{ salary.salary_month }}</td>
                      <td>
                        <router-link :to="{name: 'view-salary', params:{id: salary.salary_month} }" class="btn btn-sm btn-info">View Salary</router-link>
                      </td>
                    </tr>
        
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
       </div>
   </div>
</template>

<script>

    export default {
    	mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            } 
        },

        created(){
        this.allSalary();
        },

        data(){
          return{
            salaries:[],
            searchTerm:'',         
          }
        },
       computed:{
         filtersearch(){
          return this.salaries.filter(salary => {
             return salary.salary_month.match(this.searchTerm)
           })
         }
       },
        methods:{
          allSalary(){
            axios.get('/api/salary/')
            .then(({data}) => (this.salaries = data))
            .catch()
          },
        },
      
    }
     
  
  
</script>

<style>
	
#add_new{
	float: right;
}
#em_photo{
  height: 40px;
  width: 40px;
}

</style>
