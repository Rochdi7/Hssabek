"use client";

import { Card, Button } from "react-bootstrap";

const SoftButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Soft Buttons</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button
              variant="primary"
              className="bg-primary bg-opacity-10 fw-medium text-primary py-2 px-4"
            >
              Primary
            </Button>{" "}
            <Button
              variant="secondary"
              className="bg-secondary bg-opacity-10 fw-medium text-secondary py-2 px-4"
            >
              Secondary
            </Button>{" "}
            <Button
              variant="success"
              className="bg-success bg-opacity-10 fw-medium text-success py-2 px-4"
            >
              Success
            </Button>{" "}
            <Button
              variant="warning"
              className="bg-danger bg-opacity-10 fw-medium text-warning py-2 px-4"
            >
              Warning
            </Button>{" "}
            <Button
              variant="danger"
              className="bg-warning bg-opacity-10 fw-medium text-danger py-2 px-4"
            >
              Danger
            </Button>{" "}
            <Button
              variant="info"
              className="bg-info bg-opacity-10 fw-medium text-info py-2 px-4"
            >
              Info
            </Button>{" "}
            <Button
              variant="light"
              className="bg-light bg-opacity-10 fw-medium text-light py-2 px-4"
            >
              Light
            </Button>{" "}
            <Button
              variant="dark"
              className="bg-dark bg-opacity-10 fw-medium text-dark py-2 px-4"
            >
              Dark
            </Button>
            <Button
              variant="link"
              className="bg-link bg-opacity-10 fw-medium text-link py-2 px-4"
            >
              Link
            </Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SoftButtons;
