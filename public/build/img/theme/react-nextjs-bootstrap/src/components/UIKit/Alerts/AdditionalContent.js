"use client";

import { Card, Alert } from "react-bootstrap";
import "react-material-symbols/rounded";

const AdditionalContent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Additional Content</h4>

          <Alert variant="success">
            <Alert.Heading className="text-black">Hey, nice to see you</Alert.Heading>
            <p>
              Aww yeah, you successfully read this important alert message. This
              example text is going to run a bit longer so that you can see how
              spacing within an alert works with this kind of content.
            </p>
            <hr />
            <p className="mb-0">
              Whenever you need to, be sure to use margin utilities to keep
              things nice and tidy.
            </p>
          </Alert>
        </Card.Body>
      </Card>
    </>
  );
};

export default AdditionalContent;
