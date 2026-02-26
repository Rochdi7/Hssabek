"use client";

import { Card, Row, Col } from "react-bootstrap";
import Image from "next/image";

const welcomeData = {
  storeStats: [
    {
      id: 1,
      title: "New Customer",
      value: "14.5K",
      change: "+7%",
      changeColor: "success",
      icon: "ri-user-3-fill",
      iconBgColor: "primary",
    },
    {
      id: 2,
      title: "Sales",
      value: "$64.5K",
      change: "-1.4%",
      changeColor: "danger",
      icon: "ri-money-dollar-circle-line",
      iconBgColor: "success",
    },
    {
      id: 3,
      title: "Products",
      value: "11.9K",
      change: "+7%",
      changeColor: "success",
      icon: "ri-layout-grid-fill",
      iconBgColor: "primary-div",
    },
  ],
};

const Welcome = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 p-4"
        style={{
          background: "linear-gradient(104deg, #361E7D 2.4%, #403CFF 112.33%)",
        }}
      >
        <div className="d-flex justify-content-between flex-wrap gap-3">
          <div className="mt-sm-4 ms-sm-4">
            <span
              className="fw-medium d-block mb-2"
              style={{ color: "#C2CDFF" }}
            >
              Hello William ✋
            </span>
            <h3 className="fs-28 text-white fw-900 mb-0">
              <span className="fw-normal">Welcome To</span> Your Store!
            </h3>
          </div>
          <div className="py-sm-1">
            <Image
              src="/images/store.png"
              alt="store"
              width={208}
              height={144}
            />
          </div>
        </div>
      </Card>

      <div className="px-sm-4 px-xxl-5" style={{ marginTop: "-48px" }}>
        <Row className="justify-content-center">
          {welcomeData.storeStats.map((stat) => (
            <Col key={stat.id} md={4} sm={6}>
              <Card className="border-0 rounded-3 bg-white p-4 mb-4">
                <div className="d-flex">
                  <div className="flex-grow-1">
                    <span className="d-block mb-2">{stat.title}</span>

                    <h2 className="mb-2 fs-28">{stat.value}</h2>

                    <span
                      className={`d-inline-block bg-${stat.changeColor} bg-opacity-10 border-${stat.changeColor} border px-2 rounded-pill text-${stat.changeColor} fs-12 fw-medium`}
                    >
                      {stat.change}
                    </span>
                  </div>

                  <div className="flex-shrink-0">
                    <div
                      className={`bg-${stat.iconBgColor} bg-opacity-25 text-${stat.iconBgColor} text-center rounded-circle`}
                      style={{
                        width: "48px",
                        height: "48px",
                        lineHeight: "48px",
                      }}
                    >
                      <i className={`${stat.icon} fs-24`}></i>
                    </div>
                  </div>
                </div>
              </Card>
            </Col>
          ))}
        </Row>
      </div>
    </>
  );
};

export default Welcome;
