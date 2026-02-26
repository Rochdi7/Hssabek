"use client";

import React, { useState } from "react";
import { Form } from "react-bootstrap";
import Select from 'react-select';

const MultiTagsSelect = () => {

  const [selectedOptions, setSelectedOptions] = useState([]);

  const options = [
    { value: '1', label: 'Value 1' },
    { value: '2', label: 'Value 2' },
    { value: '3', label: 'Value 3' },
    { value: '4', label: 'Value 4' },
  ];

  const handleChange = (selected) => {
    setSelectedOptions(selected);
  };

  return (
    <>
      <Form.Group className="mb-4">
        <label className="label text-secondary">Multi Tags Select</label>

        <Form.Group className="position-relative">
          <Select
            isMulti
            value={selectedOptions}
            onChange={handleChange}
            options={options}
            classNamePrefix="react-select"
          />
        </Form.Group>
      </Form.Group>
    </>
  );
};

export default MultiTagsSelect;
