var humiditybar = new ProgressBar.Circle(container, {
    color: '#fff',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 15,
    trailWidth: 15, 
    easing: 'easeInOut',
    duration: 1400,
    text: {
      autoStyleContainer: false
    },
    from: {
      color: '#12CDFF',
      width: 15
    },
    to: {
      color: '#7BCEC4',
      width: 15
    },
    // Set default step function for all animate calls
    step: function(state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });

  humiditybar.text.style.fontSize = '0rem';
  humiditybar.animate(0.7); // Number from 0.0 to 1.0

var temperaturebar = new ProgressBar.Circle(totalVisitor, {
    color: '#fff',
    // This has to be the same size as the maximum width to
    // prevent clipping
    strokeWidth: 15,
    trailWidth: 15, 
    easing: 'easeInOut',
    duration: 1400,
    text: {
      autoStyleContainer: false
    },
    from: {
      color: '#52CDFF',
      width: 15
    },
    to: {
      color: '#677ae4',
      width: 15
    },
    // Set default step function for all animate calls
    step: function(state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100);
      if (value === 0) {
        circle.setText('');
      } else {
        circle.setText(value);
      }

    }
  });

  temperaturebar.text.style.fontSize = '0rem';
  temperaturebar.animate(.64); // Number from 0.0 to 1.0