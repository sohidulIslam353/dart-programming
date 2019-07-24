 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Customer</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Customer Insert 
            <router-link to="/customer" class="btn btn-sm btn-info" id="add_new"> All Customer</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="customerInsert" enctype="multipart/form-data">
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
	                  <input type="text" v-model="form.phone" class="form-control"  required="">
	                  <label for="lastName">Phone</label>
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
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
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
        			address:'',
        			photo :'',
        			phone:'',
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
        	customerInsert(){
        		axios.post('/api/customer/',this.form)
        		.then(() => {
        			this.$router.push({ name: 'customer' })
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
