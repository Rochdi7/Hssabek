"use client";

import React, { useState } from "react";
import { Row, Col, Card, Button, Toast } from "react-bootstrap";
import Image from "next/image";

const Autohide = () => {
  const [show, setShow] = useState(false);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Autohide</h3>
          </div>

          <Row>
            <Col xs={6}>
              <Toast
                onClose={() => setShow(false)}
                show={show}
                delay={3000}
                autohide
              >
                <Toast.Header>
                  <Image
                    src="/images/holder1.svg"
                    className="rounded me-2"
                    alt="holder"
                    width={20}
                    height={20}
                  />
                  <strong className="me-auto">Bootstrap</strong>
                  <small>11 mins ago</small>
                </Toast.Header>
                <Toast.Body>
                  Woohoo, you&apos;re reading this text in a Toast!
                </Toast.Body>
              </Toast>
            </Col>
            <Col xs={6}>
              <Button onClick={() => setShow(true)}>Show Toast</Button>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default Autohide;
