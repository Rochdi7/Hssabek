"use client";

import { Card, Button} from "react-bootstrap";

const BlockButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Block Buttons</h4>

          <div className="d-grid gap-2">
            <Button variant="primary" size="lg">
              Block level button
            </Button>
            
            <Button variant="secondary" size="lg">
              Block level button
            </Button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default BlockButtons;
