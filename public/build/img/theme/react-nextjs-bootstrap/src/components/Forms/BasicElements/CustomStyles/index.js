"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const CustomStyles = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Custom Styles</h4>

          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Group>
                    <Form.Control
                      type="text"
                      className="text-dark h-55 border-0 border-bottom"
                      placeholder="Enter Name"
                    />
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Group>
                    <Form.Control
                      type="email"
                      className="text-dark h-55 border-0 border-bottom"
                      placeholder="Email Address"
                    />
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <Form.Group>
                    <textarea
                      className="form-control border-0 border-bottom text-dark"
                      placeholder="Comment Here"
                      cols="30"
                      rows="11"
                    ></textarea>
                  </Form.Group>
                </Form.Group>
              </Col>
            </Row>

            <div className="text-end">
              <button
                type="submit"
                className="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4"
              >
                Submit
              </button>
            </div>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default CustomStyles;
