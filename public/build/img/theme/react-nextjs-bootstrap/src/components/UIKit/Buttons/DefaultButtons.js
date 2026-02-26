"use client";

import { Card, Button } from "react-bootstrap";

const DefaultButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Default Buttons</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button variant="primary">Primary</Button>{" "}
            <Button variant="secondary">Secondary</Button>{" "}
            <Button variant="success">Success</Button>{" "}
            <Button variant="warning">Warning</Button>{" "}
            <Button variant="danger">Danger</Button>{" "}
            <Button variant="info">Info</Button>{" "}
            <Button variant="light">Light</Button>{" "}
            <Button variant="dark">Dark</Button>
            <Button variant="link">Link</Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default DefaultButtons;
