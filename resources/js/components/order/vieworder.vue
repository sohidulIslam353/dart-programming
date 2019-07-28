 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Order Details</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
           Order  
          </div>
          <div class="card-body">
             	<div class="row">
             		<div class="col-lg-6 col-md-6 col-6">
             			<ul class="list-group">
						  <li class="list-group-item bg-info text-white">Customer Details</li>
						  <li class="list-group-item">Name: {{ orders.name }}</li>
						  <li class="list-group-item">Phone: {{ orders.phone }}</li>
						  <li class="list-group-item">Address: {{ orders.address }}</li>
						  <li class="list-group-item">Date : {{ orders.order_date }}</li>
						  <li class="list-group-item">Quantity: {{ orders.due }}</li>
						</ul>
             		</div>
             		<div class="col-lg-6 col-md-6 col-6">
             			<ul class="list-group">
						  <li class="list-group-item">Sub Total: {{ orders.sub_total }}</li>
						  <li class="list-group-item">Vat: {{ orders.vat }} %</li>
						  <li class="list-group-item">Total: {{ orders.total }}</li>
						  <li class="list-group-item">Pay: {{ orders.pay }}</li>
						  <li class="list-group-item">Due: {{ orders.due }}</li>
						  <li class="list-group-item">Pay Through: {{ orders.payby }}</li>
						</ul>
             		</div>
             	</div> 
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div><br>
        <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
           Order  Details 
          </div>
          <div class="card-body">
             <div class="row">
             	<div class="table-responsive">
	                <label>Search</label>
	              <br>
	                <table class="table table-bordered" id="" width="100%" cellspacing="0">

	                  <thead>
	                    <tr >
	                      <th>Name</th>
	                      <th>Code</th>
	                      <th>Image</th>
	                      <th>Qty</th>
	                      <th>Unit Price</th>
	                      <th>Total</th>
	                    </tr>
	                  </thead>
	                
	                  <tbody>

	                    <tr v-for="detail in details">
	                      <td>{{ detail.product_name }}</td>
	                      <td>{{ detail.product_code }}</td>
	                      <td><img :src="'/'+detail.image" id="em_photo"></td>
	                      <td>{{ detail.pro_quantity }}</td>
	                      <td>{{ detail.product_price }}</td>
	                      <td>{{ detail.sub_total }}</td>
	                    </tr> 
	        
	                  </tbody>
	                </table>
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
        		errors:{},
        		orders:{},
        		details:{},
        	}
        },
        created(){
        	
        	let id = this.$route.params.id
        	axios.get('/api/order/details/'+id)
        	.then(({data}) => (this.orders = data))
        	.catch()

        	axios.get('/api/order/orderdetails/'+id)
        	.then(({data}) => (this.details = data))
        	.catch()

        },
        methods:{ 	
        	
        	
        	
        }

    	
    }



  
</script>

<style>
	
#em_photo{
  height: 40px;
  width: 40px;
}

</style>
