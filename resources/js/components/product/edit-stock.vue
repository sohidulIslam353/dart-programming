 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Product Stock Update 
          </div>
           <form @submit.prevent="stockUpdate" >
          <div class="card-body">
   	          <div class="form-group">
   	               <div class="col-md-12">
   	                <div class="form-label-group">
   	                  <input type="text" v-model="form.product_quantity" class="form-control"  required="">
   	                  <label for="phone">Quantity  </label>
   	                  <small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</small>
   	                </div>
   	               </div>
   	             </div>
   	          </div><br>
              <button type="submit" class="btn btn-success">Stock Update</button>
             </form><br>
          </div>
         <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
        			product_quantity:''
        		},
        		errors:{},

        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        },
        methods:{ 	
        
        	stockUpdate(){
        		let id = this.$route.params.id
        		axios.post('/api/stock/update/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'stock' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        		
        	},
        	
        }

    	
    }



  
</script>

<style>
	

</style>
