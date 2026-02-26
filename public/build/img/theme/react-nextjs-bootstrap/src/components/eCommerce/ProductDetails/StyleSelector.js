"use client";

import React, { useState } from 'react';

function StyleSelector() {
  const [style, setStyle] = useState('Apple M1 Max Chip'); // Default value

  const handleChange = (event) => {
    setStyle(event.target.value); // Update style based on selected radio button
  };

  return (
    <>
      <div className="d-flex style-select mb-2 align-items-center">
        <span>Style:</span>
        <h5 className="mb-0 fw-medium fs-14 position-relative top-2 ms-1">
          {style}
        </h5>
      </div>

      <div className="select-style mb-4 d-flex flex-wrap gap-3">
        <div>
          <input
            type="radio"
            className="btn-check"
            name="options-base"
            id="option5"
            autoComplete="off"
            value="Apple M1 Max Chip"
            checked={style === 'Apple M1 Max Chip'}
            onChange={handleChange}
          />
          <label className="btn mb-2 mb-sm-0 border" htmlFor="option5">
            Apple M1 Max Chip
          </label>
        </div>
        <div>
          <input
            type="radio"
            className="btn-check"
            name="options-base"
            id="option6"
            autoComplete="off"
            value="Apple M1 Pro Chip"
            checked={style === 'Apple M1 Pro Chip'}
            onChange={handleChange}
          />
          <label className="btn mb-2 mb-sm-0 border" htmlFor="option6">
            Apple M1 Pro Chip
          </label>
        </div>
      </div>
    </>
  );
}

export default StyleSelector;
