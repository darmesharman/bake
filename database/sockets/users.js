module.exports =  class User {
  // username = none
  // last_update = none
  // socket_name = none
    constructor(name, last_update, socket_name) {
      this.username = name;
      this.last_update = last_update;
      this.socket_name = socket_name;
      this.data = []
    }
  
}; 
  