/*------------------------- 
Frontend related javascript
-------------------------*/

function detectPowerSavingMode() {

	if (/iP(hone|ad|od)/.test(navigator.userAgent)) {

		return new Promise((resolve) => {
			let fps = 50;
			let numFrames = 30;
			let startTime = performance.now();
			let i = 0;
			let handle = setInterval(() => {
				if (i < numFrames) {
					i++;
					return;
				}
				clearInterval(handle);
				let interval = 1000 / fps;
				let actualInterval = (performance.now() - startTime) / numFrames;
				let ratio = actualInterval / interval; // 1.3x or more in Low Power Mode, 1.1x otherwise
				console.log(actualInterval, interval, ratio);
				resolve(ratio > 1.3);
			}, 1000 / fps);
		});
	} else {

		return detectFrameRate().then((frameRate) => {

			if (frameRate < 31) {
				return true;
			} else if (navigator.getBattery) {
				return navigator.getBattery().then((battery) => {
					return (!battery.charging && battery.level <= 0.2) ? true : false;
				});
			}
			return undefined;
		});
	}
}

function detectFrameRate() {
	return new Promise((resolve) => {
		let numFrames = 30;
		let startTime = performance.now();
		let i = 0;
		let tick = () => {
			if (i < numFrames) {
				i++;
				requestAnimationFrame(tick);
				return;
			}
			let frameRate = numFrames / ((performance.now() - startTime) / 1000);
			resolve(frameRate);
		};
		requestAnimationFrame(() => {
			tick();
		});
	});
}