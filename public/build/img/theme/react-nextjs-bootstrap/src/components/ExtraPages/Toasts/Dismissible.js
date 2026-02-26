"use client";

import React, { useState } from "react";
import { Row, Col, Card, Button, Toast } from "react-bootstrap";
import Image from "next/image";

const Dismissible = () => {
  const [showA, setShowA] = useState(true);
  const [showB, setShowB] = useState(true);

  const toggleShowA = () => setShowA(!showA);
  const toggleShowB = () => setShowB(!showB);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Dismissible</h3>
          </div>

          <Row>
            <Col md={6} className="mb-2">
              <Button onClick={toggleShowA} className="mb-2">
                Toggle Toast <strong>with</strong> Animation
              </Button>
              <Toast show={showA} onClose={toggleShowA}>
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

            <Col md={6} className="mb-2">
              <Button onClick={toggleShowB} className="mb-2">
                Toggle Toast <strong>without</strong> Animation
              </Button>
              <Toast onClose={toggleShowB} show={showB} animation={false}>
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
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default Dismissible;
