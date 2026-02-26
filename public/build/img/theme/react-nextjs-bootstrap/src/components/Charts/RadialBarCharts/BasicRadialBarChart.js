"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const BasicRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [70];

  const options = {
    plotOptions: {
      radialBar: {
        hollow: {
          size: "70%",
        },
      },
    },
    labels: ["Cricket"],
    colors: ["#605DFF"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Radial Bar Chart</h3>
          </div>

          <div className="pt-4">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="radialBar"
                height={350}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default BasicRadialBarChart;
