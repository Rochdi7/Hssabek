"use client";

import { Form} from "react-bootstrap";

const TimePicker = () => {
  return (
    <>
      <Form.Group className="mb-4">
        <label className="label text-secondary">Time Picker</label>

        <Form.Control type="time" className="h-60 text-dark" />
      </Form.Group>
    </>
  );
};

export default TimePicker;
