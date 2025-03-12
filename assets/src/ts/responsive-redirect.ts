const greet = (name: string): void => {
  console.log(`Hello, ${name}!`);
};

greet('Responsive Redirect Plugin');

function getResponsiveRadioButtons() {
  const responsiveRadiButtons: NodeListOf<HTMLInputElement> =
    document.querySelectorAll('.rr_device_type');
  return responsiveRadiButtons;
}

function handleDeviceSelection() {
  const responsiveRadiButtons: NodeListOf<HTMLInputElement> =
    getResponsiveRadioButtons();

  if (responsiveRadiButtons) {
    [...responsiveRadiButtons].forEach((deviceType) => {
      deviceType.addEventListener('change', () =>
        onDeviceTypeChange(deviceType)
      );
    });
  }
}

function onDeviceTypeChange(deviceType: HTMLInputElement) {
  const responsiveCheckBoxes: NodeListOf<HTMLInputElement> =
    document.querySelectorAll('.rr_redirect_device_type');

  [...responsiveCheckBoxes].forEach((checkBox) => {
    const pattern = new RegExp(deviceType.value);
    const isDevice = pattern.test(checkBox.name);

    if (deviceType.checked && isDevice) {
      checkBox.checked = false;
      checkBox.disabled = true;
    } else {
      checkBox.disabled = false;
    }
  });
}

window.addEventListener('DOMContentLoaded', function () {
  handleDeviceSelection();

  const initialDeviceType = document.querySelector<HTMLInputElement>(
    '.rr_device_type:checked'
  );

  if (initialDeviceType) {
    console.log('initial device:', initialDeviceType.value);
    onDeviceTypeChange(initialDeviceType);
  }
});
