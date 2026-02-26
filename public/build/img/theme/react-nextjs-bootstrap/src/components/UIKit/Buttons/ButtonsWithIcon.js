"use client";

import { Card, Button } from "react-bootstrap";

const ButtonsWithIcon = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Buttons With Icon</h4>

          <div className="d-flex gap-2 flex-wrap">
            <Button variant="primary"><i className="ri-add-line"></i> Primary</Button>{" "}
            <Button variant="secondary"><i className="ri-add-line"></i> Secondary</Button>{" "}
            <Button variant="success"><i className="ri-add-line"></i> Success</Button>{" "}
            <Button variant="warning"><i className="ri-add-line"></i> Warning</Button>{" "}
            <Button variant="danger"><i className="ri-add-line"></i> Danger</Button>{" "}
            <Button variant="info"><i className="ri-add-line"></i> Info</Button>{" "}
            <Button variant="light"><i className="ri-add-line"></i> Light</Button>{" "}
            <Button variant="dark"><i className="ri-add-line"></i> Dark</Button>
            <Button variant="link"><i className="ri-add-line"></i> Link</Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ButtonsWithIcon;
