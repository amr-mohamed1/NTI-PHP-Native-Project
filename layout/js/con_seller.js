$("document").ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      

      $('.modal').on('shown.bs.modal', function () {
        $('.modal').trigger('focus')
      })

      $(".send_acc").val("mediatorx111@gmail.com");
      $(".send_method").change(function(){
          if(this.value  == "paypal"){
              $(".send_acc").val("mediatorx111@gmail.com");
          }else if(this.value  == "pioneer"){
              $(".send_acc").val("mediatorx111@gmail.com");
          }else if(this.value  == "payeer"){
              $(".send_acc").val("P1042637821");
          }else if(this.value  == "Perfect money"){
              $(".send_acc").val("U27681134");
          }else if(this.value  == "Litecoin(LTC)"){
              $(".send_acc").val("LZ4PtZpuRif4Maf3W5tXf5o77ou5P1ZsTM");
          }else if(this.value  == "Bitcoin (BTC)"){
              $(".send_acc").val("1NsqJ7ce6rC2M6s9qBpedDozqXhqriyLn2");
          }else if(this.value  == "Ethereum ETH(ERC20)"){
              $(".send_acc").val("0x1bf623392071953c7985a56f0fda63ef02f7a1c0");
          }else if(this.value  == "Dogecoin"){
              $(".send_acc").val("DDAvahpMvyRvYLWL3B3XGXtqar5bbSgDtM");
          }else if(this.value  == "Tether(TRC20) USDT"){
              $(".send_acc").val("TJHvRRAX4V95ZL8Hm3o8kXtBbu4us2J9xv");
          }else if(this.value  == "Ripple XRP"){
              $(".send_acc").val("rEb8TK3gBgk5auZkwc6sHnwrGVJH8DuaLh");
          }else if(this.value  == "Tron TRX (trc20)"){
              $(".send_acc").val("TJHvRRAX4V95ZL8Hm3o8kXtBbu4us2J9xv");
          }else if(this.value  == "Web money USD"){
              $(".send_acc").val("Z146718181094");
          }else if(this.value  == "Skrill"){
              $(".send_acc").val("mediatorx111@gmail.com");
          }else if(this.value  == "NETELLER"){
              $(".send_acc").val("mediatorx111@gmail.com");
          }else if(this.value  == "Vodafone Cash"){
              $(".send_acc").val("01021896219");
          }
      })
})

