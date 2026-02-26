"use client";

import { Form } from "react-bootstrap";

const DefaultSelect = () => {
  return (
    <>
      <Form.Group className="mb-4">
        <label className="label text-secondary">Default Select</label>

        <Form.Group className="position-relative">
          <Form.Select
            className="form-control h-60"
            aria-label="Default select example"
          >
            <option value="0" className="text-dark">
              Value 1
            </option>
            <option value="1" className="text-dark">
              Value 2
            </option>
            <option value="2" className="text-dark">
              Value 3
            </option>
            <option value="3" className="text-dark">
              Value 4
            </option>
          </Form.Select>
        </Form.Group>
      </Form.Group>
    </>
  );
};

export default DefaultSelect;
