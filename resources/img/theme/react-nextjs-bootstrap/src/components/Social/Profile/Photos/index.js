"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";

const Photos = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4 pb-2">
          <h3 className="mb-lg-4 mb-3">Photos</h3>

          <Row>
            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-6.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-7.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-8.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-9.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-10.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-11.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-12.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-13.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>

            <Col sm={4} lg={4}>
              <div className="d-block mb-3">
                <Image
                  src="/images/product-14.jpg"
                  className="rounded-2"
                  alt="product"
                  width={500}
                  height={500}
                />
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default Photos;
