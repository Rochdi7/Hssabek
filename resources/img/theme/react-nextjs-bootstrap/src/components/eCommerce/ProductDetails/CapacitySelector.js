"use client";

import React, { useState } from 'react';

function CapacitySelector() {
  const [capacity, setCapacity] = useState('512 GB'); // Default value

  const handleChange = (event) => {
    setCapacity(event.target.value); // Update capacity based on selected radio button
  };

  return (
    <>
      <div className="d-flex style-select mb-2 align-items-center">
        <span>Capacity:</span>
        <h5 className="mb-0 fw-medium fs-14 position-relative top-2 ms-1">
          {capacity}
        </h5>
      </div>

      <div className="select-style mb-4 d-flex flex-wrap gap-3">
        <div>
          <input
            type="radio"
            className="btn-check"
            name="options-outlined"
            id="success-outlined"
            autoComplete="off"
            value="512 GB"
            checked={capacity === '512 GB'}
            onChange={handleChange}
          />
          <label
            className="btn mb-2 mb-sm-0 border"
            htmlFor="success-outlined"
          >
            512 GB
          </label>
        </div>

        <div>
          <input
            type="radio"
            className="btn-check"
            name="options-outlined"
            id="danger-outlined"
            autoComplete="off"
            value="1 TB"
            checked={capacity === '1 TB'}
            onChange={handleChange}
          />
          <label
            className="btn mb-2 mb-sm-0 border"
            htmlFor="danger-outlined"
          >
            1 TB
          </label>
        </div>
      </div>
    </>
  );
}

export default CapacitySelector;
