$.ajax({
  url:`/style.css?date=${Math.floor(Math.random() * (1000 - 50 + 1)) + 50}`,
  dataType:"text",
  success:(data)=> {
    $("head").append(`<style>${data}`);
    $("head").append(`<style>@media (max-width:1135px) { ${data.replace(/([0-9]+)px/g, (v) => v.replace('px', '')/11.5+'vw')} }</style>`);
  }
});