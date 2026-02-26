"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const Gallery = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4 pb-0">
          <div className="row">
            <div className="col-lg-4 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-6.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-4 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-7.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-4 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-8.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-9.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-10.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-11.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-3 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-12.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-6 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-13.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>

            <div className="col-lg-6 col-sm-6">
              <div className="mb-4">
                <Image
                  src="/images/product-14.jpg"
                  className="rounded-3"
                  alt="product"
                  width={1070}
                  height={1070}
                />
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Gallery;
