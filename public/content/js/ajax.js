const getProduct = (field) => {
  $.ajax({
    type: "POST",
    url: "http://okulproje/getProduct",
    headers: {'X-CSRF-TOKEN': $('#token').val()},
    data: {
      res1: "val1"
    },
    success: data => {
      console.log(data);
      $(`.${field}`).text("");
      $(`.${field}`).append(data);
    }
  });
};