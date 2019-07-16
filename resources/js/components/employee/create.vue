 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Employee</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Employee Insert 
            <router-link to="/employee" class="btn btn-sm btn-info" id="add_new"> All Employee</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="employeeInsert" enctype="multipart/form-data">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
	                  <label for="firstName">Full Name</label>
	                </div>
	               </div>
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.email" class="form-control" >
	                  <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
	                  <label for="lastName">Email Address</label>
	                </div>
	               </div>
	             </div>
	          </div>
	          <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.address" class="form-control"  required="">
	                  <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
	                  <label for="firstName">Address</label>
	                </div>
	               </div>
	               <div class="col-md-6">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.salary" class="form-control"  required="">
	                  <label for="lastName">Salary</label>
	                  <small class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
	                </div>
	               </div>
	             </div>
	          </div>
	          <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-4">
	                <div class="form-label-group">
	                  <input type="date" v-model="form.joining_date" class="form-control"  autofocus="autofocus" required="">
	                  <small class="text-danger" v-if="errors.joining_date">{{ errors.joining_date[0] }}</small>
	                  <label for="firstName">Joining Date</label>
	                </div>
	               </div>
	               <div class="col-md-4">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.nid" class="form-control"  required="">
	                  <label for="nid">NID Number</label>
	                  <small class="text-danger" v-if="errors.nid">{{ errors.nid[0] }}</small>
	                </div>
	               </div>
	               <div class="col-md-4">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.phone" class="form-control"  required="">
	                  <label for="phone">Phone Number</label>
	                  <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
	                </div>
	               </div>
	             </div>
	          </div>
               <div class="form-group">
	              <div class="form-row">
	               

	               <div class="col-md-6">
	                <div class="form-label-group">
	                 <input type="file" class="btn btn-info" @change="onFileselected">
	       
	                  <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
	                </div>
	               </div>
	                <div class="col-md-6">
	                	<img :src="form.photo" style="height:40px; width: 40px;">
	                </div>
	             </div>
	          </div>

               <button type="submit" class="btn btn-success">Submit</button>
              </form>
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
        			name :'',
        			email :'',
        			salary:'',
        			address:'',
        			photo :'',
        			phone:'',
        			nid : '',
        			joining_date:''
        		},
        		errors:{},
        	}
        },
        

        methods:{ 	
        	onFileselected(event){
        		let file=event.target.files[0];
        		if (file.size > 1048770) {
        			Notification.image_validation()
        		}else{
        			let reader = new FileReader();
        			reader.onload = event => {
        				this.form.photo = event.target.result

        				console.log(event.target.result);
        			};
        			reader.readAsDataURL(file);

        		}
        	},
        	employeeInsert(){
        		axios.post('/api/employee/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'employee' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},
        	
        }

    	
    }



  
</script>

<style>
	
#add_new{
	float: right;
}

</style>
