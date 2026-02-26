"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const BasicTreemapChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      data: [
        {
          x: "London",
          y: 218,
        },
        {
          x: "New York",
          y: 149,
        },
        {
          x: "Tokyo",
          y: 184,
        },
        {
          x: "Beijing",
          y: 55,
        },
        {
          x: "Paris",
          y: 84,
        },
        {
          x: "Chicago",
          y: 31,
        },
        {
          x: "Osaka",
          y: 70,
        },
        {
          x: "İstanbul",
          y: 30,
        },
        {
          x: "Bangkok",
          y: 44,
        },
        {
          x: "Madrid",
          y: 68,
        },
        {
          x: "Barcelona",
          y: 28,
        },
        {
          x: "Toronto",
          y: 19,
        },
        {
          x: "Shanghai",
          y: 29,
        },
      ],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },
    title: {
      text: "Basic Treemap",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Treemap Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="treemap"
              height={330}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default BasicTreemapChart;
