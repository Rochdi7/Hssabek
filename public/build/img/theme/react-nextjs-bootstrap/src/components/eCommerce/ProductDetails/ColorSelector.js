"use client";

import React, { useState } from 'react';

function ColorSelector() {
  const [color, setColor] = useState('Silver'); // Default color

  const handleColorChange = (selectedColor) => {
    setColor(selectedColor);
  };

  return (
    <>
      <div className="d-flex style-select mb-2 align-items-center">
        <span>Color:</span>
        <h5 className="mb-0 fw-medium fs-14 position-relative top-2 ms-1">
          {color}
        </h5>
      </div>

      <ul className="d-flex ps-0 mb-0 list-unstyled select-color gap-2 mb-4">
        <li 
          className={`color1 ${color === 'Silver' ? 'active' : ''}`}
          onClick={() => handleColorChange('Silver')}
          style={{ cursor: 'pointer' }}
        ></li>
        <li 
          className={`color2 ${color === 'Space Gray' ? 'active' : ''}`}
          onClick={() => handleColorChange('Space Gray')}
          style={{ cursor: 'pointer' }}
        ></li>
      </ul>
    </>
  );
}

export default ColorSelector;
