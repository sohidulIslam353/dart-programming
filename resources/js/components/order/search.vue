 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Search Order</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Search Orders 
            <router-link to="/order" class="btn btn-sm btn-info" id="add_new"> Today Order</router-link>
          </div>
          <div class="row">
          	<div class="col-lg-6">
          	  <form @submit.prevent="searchDate">
	            <div class="card-body">
	                <div class="form-group">
		              <div class="form-row">
		               <div class="col-md-12">
		                <div class="form-group">
						   <label for="exampleFormControlSelect2">Search By Date</label>
						    <input type="date" required="" class="form-control" v-model="form.date">
						  </div>
		               </div><br>
		               <button type="submit" class="btn btn-success">Search</button>
		             </div>
		            </div>     
		          </div>
	              
	            </form>
          	</div>
          	<div class="col-lg-6">
          	  <form @submit.prevent="searchMonth">
	            <div class="card-body">
	                <div class="form-group">
		              <div class="form-row">
		               <div class="col-md-12">
		               <div class="form-group">
		                   <label for="exampleFormControlSelect2">Search By Month</label>
		                   <select  class="form-control" id="exampleFormControlSelect2" v-model="form.month">
		                     <option value="January">January</option>
		                     <option value="February">February</option>
		                     <option value="March">March</option>
		                     <option value="April">April</option>
		                     <option value="May">May</option>
		                     <option value="june">june</option>
		                     <option value="July">July</option>
		                     <option value="August">August</option>
		                     <option value="September">September</option>
		                     <option value="October">October</option>
		                     <option value="November">November</option>
		                     <option value="December">December</option>
		                   </select>
		                 </div>
		               </div><br>
		               <button type="submit" class="btn btn-success">Search</button>
		             </div>
		            </div>     
		          </div>
	              
	            </form>
          	</div>

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
        data(){
        	return{
        		form:{
        			date :'',
        			month:''
        		},
        		errors:{},
        	}
        },
        

        methods:{ 	
        	searchDate(){
        		axios.post('/api/search/order',this.form)
        		.then(() => {
        			// this.$router.push({ name: 'category' })
        			// Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},
        	searchMonth(){
        		axios.post('/api/search/month',this.form)
        		.then(() => {
        			// this.$router.push({ name: 'category' })
        			// Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	}
        	
        	
        }

    	
    }



  
</script>

<style>
	
#add_new{
	float: right;
}

</style>
