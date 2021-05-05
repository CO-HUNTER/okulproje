"use strict";

class Notification {
  init() {
    let parentElem = document.createElement("div");
    parentElem.classList.add("alertMessageContainer");

    document.querySelector("body").appendChild(parentElem);
  }

  error(msg, duration) {
    let alertErrorMessage = document.createElement("div");
    let msgContent = document.createElement("p");
    duration = duration ? duration : 2000;

    alertErrorMessage.classList.add("alertError");
    msgContent.innerText = msg;

    alertErrorMessage.appendChild(msgContent);

    setTimeout(() => {
      alertErrorMessage.classList.add("active");
    }, 10);

    this.addPage(alertErrorMessage);

    setTimeout(() => {
      alertErrorMessage.classList.add("hide");
      alertErrorMessage.style.transform = "scale(0)";
    }, duration);

    this.deletePage(alertErrorMessage, duration);

  }

  success(msg, duration) {
    let alertSuccessMessage = document.createElement("div");
    let msgContent = document.createElement("p");
    duration = duration ? duration : 2000;

    alertSuccessMessage.classList.add("alertSuccess");
    msgContent.innerText = msg;

    alertSuccessMessage.appendChild(msgContent);

    setTimeout(() => {
      alertSuccessMessage.classList.add("active");
    }, 10);

    this.addPage(alertSuccessMessage);

    setTimeout(() => {
      alertSuccessMessage.classList.add("hide");
      alertSuccessMessage.style.transform = "scale(0)";
    }, duration);

    this.deletePage(alertSuccessMessage, duration);
  }

  addPage(item) {
    document.querySelector(".alertMessageContainer").appendChild(item);
  }

  deletePage(elememt, timing) {
    setTimeout(() => {
      elememt.remove();
    }, timing + 1000);
  }
}

//--- Classı oluşturup ilk başta çalışması gereken metodu çalıştırıyoruz
let alert = new Notification();
alert.init();