"use client";

import { Card, Button } from "react-bootstrap";

const OutlineRoundedButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Outline Rounded Buttons</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button
              variant="outline-primary"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Primary
            </Button>{" "}
            <Button
              variant="outline-secondary"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Secondary
            </Button>{" "}
            <Button
              variant="outline-success"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Success
            </Button>{" "}
            <Button
              variant="outline-warning"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Warning
            </Button>{" "}
            <Button
              variant="outline-danger"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Danger
            </Button>{" "}
            <Button
              variant="outline-info"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Info
            </Button>{" "}
            <Button
              variant="outline-light"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Light
            </Button>{" "}
            <Button
              variant="outline-dark"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Dark
            </Button>
            <Button
              variant="outline-link"
              className="py-2 px-4 hover-white rounded-pill"
            >
              Link
            </Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OutlineRoundedButtons;
