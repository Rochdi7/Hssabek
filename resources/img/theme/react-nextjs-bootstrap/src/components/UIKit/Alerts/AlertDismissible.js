"use client";

import { Card, Button, Alert } from "react-bootstrap";
import { useState } from "react"; 

const AlertDismissible = () => {
  const [show, setShow] = useState(true);

  if (show) {
    return (
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Alert Dismissible</h4>

          <Alert variant="danger" onClose={() => setShow(false)} dismissible>
            <Alert.Heading className="text-black">Oh snap! You got an error!</Alert.Heading>
            <p>
              Change this and that and try again. Duis mollis, est non commodo
              luctus, nisi erat porttitor ligula, eget lacinia odio sem nec
              elit. Cras mattis consectetur purus sit amet fermentum.
            </p>
          </Alert>
        </Card.Body>
      </Card>
    );
  }

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Button onClick={() => setShow(true)}>Show Alert</Button>
        </Card.Body>
      </Card>
    </>
  );
};

export default AlertDismissible;
