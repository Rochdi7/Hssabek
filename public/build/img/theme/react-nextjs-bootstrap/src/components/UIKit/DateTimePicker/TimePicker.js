"use client";

import { Card } from "react-bootstrap";

const TimePicker = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Time Picker</h4>

          <div className="form-group mb-0">
            <label className="label">Time Picker</label>
            <div className="form-group position-relative">
              <input
                type="time"
                className="form-control h-55 text-dark ps-5 h-58"
              />
              <i className="ri-time-line position-absolute top-50 translate-middle-y fs-20 text-gray-light ps-20"></i>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TimePicker;
