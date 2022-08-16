// Validation Function ----------------------------

function require(input) {
  const error = toTitle(input.name) + " harus diisi";
  return !input.value && error;
}

function alpha(input) {
  const error = "Hanya boleh karakter (A-Z) tanpa spasi";
  return input.value && !input.value.match(/^[A-Za-z]+$/) && error;
}

function alpha_space(input) {
  const error = "Hanya boleh karakter (A-Z) dan spasi";
  return input.value && !input.value.match(/^[A-Za-z\s]+$/) && error;
}

function num(input) {
  const error = "Hanya boleh angka (1-9)";
  return input.value && !input.value.match(/^[0-9]+$/) && error;
}

function alpha_num(input) {
  const error = "Hanya boleh karakter (A-Z) dan angka (1-9)";
  return input.value && !input.value.match(/^[0-9A-Za-z]+$/) && error;
}

function alpha_num_space(input) {
  const error = "Hanya boleh karakter (A-Z), angka (1-9), dan spasi";
  return input.value && !input.value.match(/^[0-9A-Za-z\s]+$/) && error;
}

function alpha_num_symbol(input) {
  const error = "Hanya boleh karakter (A-Z), angka (1-9), dan simbol (!@#$)";
  return input.value && !input.value.match(/^[!@#$0-9A-Za-z]+$/) && error;
}

function password(input) {
  const error = "Hanya boleh karakter (A-Z), angka (1-9), dan simbol (!@#$)";
  return (
    input.value &&
    input.value !== "Password otomatis" &&
    !input.value.match(/^[!@#$0-9A-Za-z]+$/) &&
    error
  );
}

function min_length(input, lng) {
  const error = `Tidak boleh kurang dari ${lng} huruf/digit`;
  return input.value && input.value.length < lng && error;
}

function max_length(input, lng) {
  const error = `Tidak boleh lebih dari ${lng} huruf/digit`;
  return input.value && input.value.length > lng && error;
}

function custom_name(input) {
  const error = "Hanya boleh karakter (A-Z), angka (1-9), dan simbol (. ,)";
  return input.value && !input.value.match(/^[.,A-Za-z\s]+$/) && error;
}

function date(input) {
  const error = "Masukkan format seperti contoh ( 2000-12-31T12:12 )";
  console.log(input.value);
  return (
    input.value &&
    !input.value.match(/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/) &&
    error
  );
}

// Validate ----------------------------------------

let allError = [];
function validate(input, type) {
  let error = [];

  type.map((func) => {
    let check;
    if (func[0]) {
      check = func[0](input, func[1]);
      func = func[0];
    } else {
      check = func(input);
    }

    check &&
      error.push({
        func: func.name,
        input: input.value,
        error: check,
      });
  });

  //Display Error
  if (error[0] && !allError.includes(input.name)) {
    allError.push(input.name);
    $(`#${input.id}`)
      .parent()
      .siblings("#error-" + input.name)
      .html(error[0].error);
  } else if (error[0] && allError.includes(input.name)) {
    $(`#${input.id}`)
      .parent()
      .siblings("#error-" + input.name)
      .html(error[0].error);
  } else if (!error[0]) {
    allError = allError.filter((e) => e !== input.name);
    $(`#${input.id}`)
      .parent()
      .siblings("#error-" + input.name)
      .html("");
  }

  //Handle Submit Button
  if (allError.length > 0) {
    $(`#${input.id}`)
      .parents("form")
      .find("button:submit")
      .attr("disabled", "disabled");
  } else {
    $(`#${input.id}`)
      .parents("form")
      .find("button:submit")
      .removeAttr("disabled");
  }
}

//Util
function toTitle(text) {
  return text.replace(/_/g, " ").replace(/(?:^\w|[A-Z]|\b\w)/g, (word) => {
    return word.toUpperCase();
  });
}
