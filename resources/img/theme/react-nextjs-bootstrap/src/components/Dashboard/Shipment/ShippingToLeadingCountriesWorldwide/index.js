"use client";

import { Card, Row, Col } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";

const ShippingToLeadingCountriesWorldwide = () => {
  // Dynamic data for countries
  const countries = [
    {
      name: "United States",
      percentage: "85%",
      image: "/images/united-states-2.png",
    },
    { name: "Germany", percentage: "75%", image: "/images/germany-2.png" },
    {
      name: "United Kingdom",
      percentage: "40%",
      image: "/images/united-kingdom-2.png",
    },
    { name: "Canada", percentage: "10%", image: "/images/canada-2.png" },
    { name: "Portugal", percentage: "05%", image: "/images/portugal.svg" },
    { name: "Spain", percentage: "15%", image: "/images/spain.svg" },
    { name: "France", percentage: "25%", image: "/images/france.svg" },
    { name: "Australia", percentage: "55%", image: "/images/australia.png" },
  ];

  return (
    <>
      <Card className="border-0 rounded-3 bg-primary mb-4">
        <Card.Body className="p-4">
          <h3
            className="text-white mx-auto mb-4 text-center"
            style={{ maxWidth: "230px", lineHeight: "1.5" }}
          >
            Shipping to leading countries worldwide
          </h3>

          <WorldMapContent />

          <Row>
            {countries.map((country, index) => (
              <Col sm={6} key={index}>
                <div className="d-flex align-items-center mt-3">
                  <Image
                    src={country.image}
                    className="rounded-circle"
                    alt={country.name.toLowerCase()}
                    width={16}
                    height={16}
                  />
                  <span className="text-white ms-2">
                    {country.name} {country.percentage}
                  </span>
                </div>
              </Col>
            ))}
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default ShippingToLeadingCountriesWorldwide;
