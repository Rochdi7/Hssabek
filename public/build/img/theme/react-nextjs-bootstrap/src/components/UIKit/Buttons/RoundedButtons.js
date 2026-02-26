"use client";

import { Card, Button } from "react-bootstrap";

const RoundedButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Rounded Buttons</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button variant="primary" className="text-white py-2 px-4 rounded-pill">Primary</Button>{" "}
            <Button variant="secondary" className="text-white py-2 px-4 rounded-pill">Secondary</Button>{" "}
            <Button variant="success" className="text-white py-2 px-4 rounded-pill">Success</Button>{" "}
            <Button variant="warning" className="text-white py-2 px-4 rounded-pill">Warning</Button>{" "}
            <Button variant="danger" className="text-white py-2 px-4 rounded-pill">Danger</Button>{" "}
            <Button variant="info" className="text-white py-2 px-4 rounded-pill">Info</Button>{" "}
            <Button variant="light" className="text-white py-2 px-4 rounded-pill">Light</Button>{" "}
            <Button variant="dark" className="text-white py-2 px-4 rounded-pill">Dark</Button>
            <Button variant="link" className="text-white py-2 px-4 rounded-pill">Link</Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RoundedButtons;
