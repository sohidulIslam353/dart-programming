
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
///end authentication------
 //employee cmponent
let employee = require('./components/employee/index.vue').default;
let storeemployee = require('./components/employee/create.vue').default;
let editemployee = require('./components/employee/edit.vue').default;
//supplier component
let storesupplier = require('./components/supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let editsupplier = require('./components/supplier/edit.vue').default;
//category
let storecategory = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;
let editcategory = require('./components/category/edit.vue').default;

let home = require('./components/home.vue').default;

export const routes = [
  { path: '/', component: login, name:'/' },
  { path: '/register', component: register , name:'register' },
  { path: '/forget', component: forget , name:'forget' },
  { path: '/logout', component: logout , name:'logout' },
  { path: '/home', component: home , name:'home' },
  //employee routes
  { path: '/store-employee', component: storeemployee, name:'store-employee' },
  { path: '/employee', component: employee, name:'employee' },
  { path: '/edit-employee/:id', component: editemployee, name:'edit-employee' },
  //supplier
   { path: '/store-supplier', component: storesupplier, name:'store-supplier' },
   { path: '/supplier', component: supplier, name:'supplier' },
   { path: '/edit-supplier/:id', component: editsupplier, name:'edit-supplier' },
   //category
   { path: '/store-category', component: storecategory, name:'store-category' },
   { path: '/category', component: category, name:'category' },
   { path: '/edit-category/:id', component: editcategory, name:'edit-category' },

]