$(document).ready(function () {
  $(document).on("input", ".number-separator", function (e) {
    // console.log($(this).val().replace(/\./g, "").toLocaleString("id"));
    if (/first$/.test($(this).val())) {
      if (/[.]$/.test($(this).val())) {
        const split = $(this).val().split(",");
        $(this).val(
          parseFloat(
            split[0].replace(/\./g, ",").replace(/first/, "")
          ).toLocaleString("id") +
            "," +
            split[1]
        );
      } else {
        $(this).val(
          parseFloat($(this).val().replace(/first/g, "")).toLocaleString("id")
        );
      }
    } else if (/^[0-9.]+$/.test($(this).val())) {
      $(this).val(
        parseFloat($(this).val().replace(/\./g, "")).toLocaleString("id")
      );
    } else if (/,$/.test($(this).val())) {
    } else if (/,/.test($(this).val())) {
      const split = $(this).val().split(",");
      $(this).val(
        parseFloat(split[0].replace(/\./g, "")).toLocaleString("id") +
          "," +
          split[1].replace(/[^0-9]/g, "")
      );
    } else {
      $(this).val(
        $(this)
          .val()
          .substring(0, $(this).val().length - 1)
      );
    }
  });
});
