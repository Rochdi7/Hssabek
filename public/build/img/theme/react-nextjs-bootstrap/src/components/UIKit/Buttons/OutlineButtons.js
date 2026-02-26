"use client";

import { Card, Button } from "react-bootstrap";

const OutlineButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Outline Buttons</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button variant="outline-primary">Primary</Button>{" "}
            <Button variant="outline-secondary">Secondary</Button>{" "}
            <Button variant="outline-success">Success</Button>{" "}
            <Button variant="outline-warning">Warning</Button>{" "}
            <Button variant="outline-danger">Danger</Button>{" "}
            <Button variant="outline-info">Info</Button>{" "}
            <Button variant="outline-light">Light</Button>{" "}
            <Button variant="outline-dark">Dark</Button>
            <Button variant="outline-link">Link</Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OutlineButtons;
