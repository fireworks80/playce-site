function TickAnimation(config) {
  this.startTime = null;
  this.wrap = null;
  this.domDatas = null;
  this.sec = 1000;
  this.isPlaying = false;
  this.loopCount = 0;
  this.datas = config.datas;
  this.tickCount = config.tickCount;
  this.callBack = config.callBack;
  this.direction = config.direction;
  this.init(config.el);
}

var fn = TickAnimation.prototype;

fn.init = function (el) {
  this.wrap = document.querySelector(el);
  this._setDomElem();
  // this.start();
};

fn._setDomElem = function () {
  var tempString = '';

  if (!this.domDatas) {
    this.domDatas = this.datas.map(this.callBack.bind(this));
  }

  // console.log(typeof this.domDatas);

  for (var i = 0, len = this.domDatas.length; i < len; i += 1) {
    tempString += this.domDatas[i];
  }

  // this.domDatas.forEach((data, idx) => {
  //   tempString += data;
  // });

  // console.log(tempString);
  this.wrap.innerHTML = '';
  this.wrap.insertAdjacentHTML('afterbegin', tempString);
  this[this.direction]();
};

fn.reverseDirection = function () {
  this.domDatas.unshift(this.domDatas.pop());
};

fn.orthodromicDirection = function () {
  this.domDatas.push(this.domDatas.shift());
};

fn._inComplete = function () {
  this.wrap.classList.add('anim');
  this._complete();
};

fn._complete = function () {
  setTimeout(function () {
    this._setDomElem();
    this.wrap.classList.remove('anim');
    this.start();
  }.bind(this), this.sec);
};

fn.stop = function () {
  if (this.isPlaying) this.isPlaying = false;
  return;
};

fn._loop = function () {
  // debug('loop');
  if (this.isPlaying) {
    // debug('start loop');
    requestAnimationFrame(this._loop.bind(this));

    var current = Date.now();
    var ellipse = Math.floor((current - this.startTime) / this.sec);

    if (ellipse > this.tickCount) {
      this.loopCount += 1;
      this._inComplete();
      this.stop();
      // this.startTime = Date.now();
    }
  }

};

fn.resetLoopCount = function () {
  this.loopCount = 0;
};

fn.getLoopCount = function () {
  return this.loopCount;
};

fn.getWrapEl = function () {
  return this.wrap;
};

fn.start = function () {
  // console.log('start');
  this.isPlaying = true;
  this.startTime = Date.now();
  this._loop();
};